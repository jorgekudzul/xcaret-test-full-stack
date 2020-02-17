<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DefActividad;

/**
 * DefActividadSearch represents the model behind the search form of `app\models\DefActividad`.
 */
class DefActividadSearch extends DefActividad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddef_actividad', 'iddef_categoria', 'iddef_restricciones', 'estado'], 'integer'],
            [['nombre', 'descripcion', 'usuario_creacion', 'fecha_creacion'], 'safe'],
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
        $query = DefActividad::find();

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
            'iddef_actividad' => $this->iddef_actividad,
            'iddef_categoria' => $this->iddef_categoria,
            'iddef_restricciones' => $this->iddef_restricciones,
            'estado' => $this->estado,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'usuario_creacion', $this->usuario_creacion]);

        return $dataProvider;
    }
}
