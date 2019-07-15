<?php
  namespace frontend\models; 

  use yii\db\ActiveRecord;
  use yii\data\ActiveDataProvider;
  use common\models\Life;


  class Life extends ActiveRecord {
    
    /*
      只有 searchModel拥有的属性, 而且在 searchModel的 rules()中 声明了验证规则的属性才能支持搜索
      新增属性或关联表的属性要有搜索功能，
      需要重写 attributes()方法， 并在rules() 中声明该属性的验证规则
    */
    public function attributes() {
      // 关联表的属性 authName
      return array_merge(parent::attributes(), ['authName', 'userName'])
    }

    public function rules() {
      return [
        [['authName', 'username'], 'safe']
      ];
    }



    public function search($params) {
      $query = self::find();
      $options = [
        'query' => $query,
        'pagination' => [
          'pageSize' => 10
        ],
        'sort' => [
          // 设置默认排序字段和排序方式
          'defaultOrder' => [
              'id' => SORT_DESC
          ],
          'attributes' => [//设置可以排序的字段
              'id',
              'title',
              // 将某个字段的排序映射到关联表字段排序
              'author_name' => [
                'asc' => ['Adminuser.nickname' => SORT_ASC],
                'desc' => ['Adminuser.nickname' => SORT_DESC]
              ]
          ]
      ];

      $dataProvider = new ActiveDataProvider($options);


      $this->load($params);
      if(!$this->validate()) {
        return $dataProvider;
      }


      $query->andFilterWhere(['uid' => $this->uid]);
      $query->andFilterWhere(['like', 'con_morning', $this->con_morning]);
      $query->andFilterWhere(['like', 'con_afternoon', $this->con_afternoon]);
      $query->andFilterWhere(['like', 'con_night', $this->con_night]);
      $query->andFilterWhere(['like', 'note', $this->note]);


      // 多表关联查询
      $query->join('inner join', 'Adminuser', 'post.author_id = Adminuser.id');
      $query->andFilterWhere(['like', 'Adminuser.nickname', $this->author_name]);
      
      return $dataProvider;
    }

  }
?>