/** 流程控制函数

  if
    select if(sex='mail', name, id) from 'emp';

    ifnull

    select case when expr1 then expr2 else expr3 end;
    select case
      when sex='mail'
      then birthday
      else entry_date as 'yy' from 'emp';
*/