/*
1. 时间日期函数
2. 字符串函数
3. 数学函数
4. 流程控制函数
5. 其他函数
*/
-- 时间日期函数
	ccurrent_date()
  -- 没有表的情况下，用 dual
  select current_date() from dual;
  current_time()
  current_timestamp()

  date_add()
  
  date_sub()

  datediff()

  now()

  date(datetime)
  year(datetime)
  month(datetime)

  from_unixtime()

  unix_timestamp()



-- 字符串函数
	charset()

  concat(string, ...)

  ucase()

  lcase()

  length()

  replace(string, search_str, replace_str)

  -- 从 1开始
  substring(string, position)



-- 数学函数
	abs()

  ceiling()

  floor()

  format(number, decimal_place) // 保留2位小数

  rand()



-- 流程控制函数
	if
  select if(sex='mail', name, id) from 'emp';

  ifnull

  select case when expr1 then expr2 else expr3 end;
  select case 
    when sex='mail' 
    then birthday
    else entry_date as 'yy' from 'emp';



-- 其他函数
	user()
  -- 查询用户 哑元表
  select user() from dual;

  datebase()
  -- 数据库名称

  MD5(str)
  -- md5 对字符串进行加密后得到一个 32字节的值
  select md5('abc') from dual;

  password(str)
  -- 得到一个加密后的字符串
  select * from mysql.user


