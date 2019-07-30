# ActiveRecord 活动记录

1. 声明 ActiveRecord 类
```php
  use yii\db\ActiveRecord;

  class Post extends ActiveRecord {
    public static function tableName() {
      return '{%post}';
    }
  }

```



## ActiveRecord 生命周期
1. new()
2. find()
3. save()
4. delete()
5. refresh()