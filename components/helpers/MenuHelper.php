<?php
namespace app\components\helpers;

use Yii;
use app\models\Menu;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class MenuHelper
{

    /**
    * Función que genera los items para el menú, apartir de los registros de la BD
    * @return Array
    */
    public static function getItems()
    {
        $ArrayMenu = [];
        if (!Yii::$app->user->isGuest) {
            $where = ['estado' => 1];
            $columns = ['url', 'label', 'idmenu', 'id_padre'];
            $menus = Menu::find()->select($columns)->where($where)
                        ->andWhere('id_padre IS NULL')->all();
            $hijos = Menu::find()->select($columns)->where($where)
                        ->andWhere('id_padre IS NOT NULL')->all();

            $hijos = ArrayHelper::index($hijos, 'idmenu', 'id_padre');

            foreach ($menus as $key => $nodo) {
                $leafts = [];
                if (array_key_exists($nodo->idmenu, $hijos)) {
                    $leafts['items'] = self::createLeaf($hijos[$nodo->idmenu]);
                    unset($hijos[$nodo->idmenu]);
                }
                $items = self::createItem($nodo, ['label' => $nodo->label, 'id' => $nodo->idmenu.$key.'del-menu']);
                $ArrayMenu[] = array_merge($items, $leafts);
            }

            $ArrayMenu[] = ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
        } else {
            $ArrayMenu[] = ['label' => "Login", 'url' => ['/site/login']];
        }

        return $ArrayMenu;
    }

    public function createItem($row, $linkOptions = [])
    {
        // if ($row->id_padre == 0) {
        //     $row->url = '/#';
        // }
        // $linkOptions['style'] = (Yii::$app->user->can($row->rbac_name) || Yii::$app->user->can('ADMIN')) ? '' : 'display:none;';
        return [
            'url'    => Url::toRoute([$row->url]),
            'label' => $row->label,
            'linkOptions' => $linkOptions,
        ];
    }

    public function createLeaf($hijos)
    {
        $leafs = [];
        if (!empty($hijos)) {
            foreach ($hijos as $key => $leaf) {
                $leafs[] = self::createItem($leaf, ['translate' => $leaf->label, 'id' => $leaf->idmenu.$key.'del-menu']);
            }
        }
        return $leafs;
    }
}
