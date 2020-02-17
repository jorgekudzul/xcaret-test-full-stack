<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefRestricciones;

/**
 * DefRestriccionesSearch represents the model behind the search form of `app\models\DefRestricciones`.
 */
class DefRestriccionesSearch extends DefRestricciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddef_restricciones', 'estado'], 'integer'],
            [['descripcion', 'usuario_creacion', 'fecha_creacion'], 'safe'],
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
        $query = DefRestricciones::find();

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
            'iddef_restricciones' => $this->iddef_restricciones,
            'estado' => $this->estado,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'usuario_creacion', $this->usuario_creacion]);

        return $dataProvider;
    }
}
