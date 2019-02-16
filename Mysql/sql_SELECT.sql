-- SELECT 查询

-- 多个条件 limit 最后
  select * from where group by having order by  limit

-- as 别名
  select col_name as 'alias' from 'tb_name';

-- count(*) 总数，忽略 null，解决方法 ifnull(name, 'default')
  select count(*) from 'tb_name';
  select count(*) from 'tb_name' where ...

-- sum() 求和，仅对数值有效，否则报错
  select sum(列名), sum(列名) from 'tb_name';

-- max() 最大值
  select max(col_name) from 'tb_name' where ;

-- min() 最小值
  select min(col_name) from 'tb_name' where ;

-- avg() 平均值
  select avg(col_name) from 'tb_name' where ;

-- group by 分组
  select 'col_name', 'col_name' from 'tb_name'
  group by 'col_name';

-- having 过滤分组后数据
  select 'col_name', 'col_name' from 'tb_name' 
  group by 'col_name'
  having;

-- 多标准分组
  select 'depto.job', avg(sal), max(sal) from 'emp'
    group by depto.job;

-- 多参照排序
  select * from 'emp' order by depto asc, sal, desc;


-- order by 排序
  -- order by 位于 select 语句的结尾
  -- asc 升序，默认，desc 降序
  select 'col_name', 'col_name' from 'tb_name' order by 'col_name' desc;


-- 分页 pagesize * (pagenow - 1) * pagesize
  select * from 'emp' limit pagesize * (pagenow - 1) * pagesize;



/* WHERE 语句中的运算符
  逻辑运算符
    AND
    OR
    NOT

  比较运算符
    between ... and ...
    in(set)
    is null 是否为空
    
    >, <, <=, >=, =, <>, !=

    LIKE 模糊查询，表示某个字段中含有某些信息
      like '张%'
      % 任意多个字符，_ 代表一个字符
    NOT LIKE 
*/

