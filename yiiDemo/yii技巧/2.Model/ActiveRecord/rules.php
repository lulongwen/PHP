<?php

public function rules() {
  return [
    // 验证, 值必须大于或等于 30
    ['compare',['compareValue'] => 30, 'operator' => '>=']
  ];
}

?>