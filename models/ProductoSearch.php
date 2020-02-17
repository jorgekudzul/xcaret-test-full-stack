<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idproducto', 'iddef_tipo_producto', 'estado'], 'integer'],
            [['clave_producto', 'nombre_producto', 'usuario_creacion', 'fecha_creacion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Producto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idproducto' => $this->idproducto,
            'iddef_tipo_producto' => $this->iddef_tipo_producto,
            'estado' => $this->estado,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'clave_producto', $this->clave_producto])
            ->andFilterWhere(['like', 'nombre_producto', $this->nombre_producto])
            ->andFilterWhere(['like', 'usuario_creacion', $this->usuario_creacion]);

        return $dataProvider;
    }

    public function searchProductos($tipo)
    {
        return Producto::find()->where(["iddef_tipo_producto" => $tipo])->all();
    }
}
