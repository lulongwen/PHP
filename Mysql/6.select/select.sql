/** SELECT 查询
  多表查询
    基于 2个或2个以上的表或试图的查询，结果是【笛卡尔集】
    自连接，在同一张表的链接查询

  子查询
    嵌入在其他 sql语句中的 select语句，也叫嵌套查询
    from 子句中使用子查询，把子查询看做一个临时的表使用，需要定义别名 alias
    select 'emp.*', 'emp2.name' from emp3;

    select e1.* from emp e1
      where e1.sal > select avg(sal)
      from emp where deptno = e1.deptno;

  合并查询，合并多个 select 语句
    union 自动去重
    union all 不去重

  内链接
    inner join ... on
    select 字段名 from 表名 inner join 表名2 on 条件

外链接
  左外连接，左侧的表完全显示
    left join ... on ...
    select 字段名...  from 表名 left join 表名2 on 条件

  右外连接，右侧的表完全显示
    right join ... on ...
    select 字段名... from 表名 right join 表名2 on 条件

  完全外连接，完全显示2个表，没有匹配的记录设置为空

  distinct 表的数据去重复
    先创建一个相同的表

*/

// 查询表的所有字段
select * from table_name;

// 查询单个字段
select 字段1, 字段2, 字段3 from table_name;


// 分页，select * from table_name limit 偏移量, 显示的数量;
// 查询3条数据
select * from table_name limit 0, 3;


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

  select * from user\G;


# 多表查询


# 子查询
  select `emp1.*`, `emp2.myavg` from `emp`
    select e1.* from emp e1
    where e1.sal > select avg(sal) from emp where deptno = e1.deptno;


# 合并查询
  union 自动去重
  union all 不去重
    select * from `emp` 
    where(sal, comm) = 
    select sal, comm from `emp` where ename = 'jim';



# 内链接
  select 字段名 from 表名 inner join 表名2 on 条件



# 外链接
-- 左外连接，左侧的表完全显示
  select 字段名...  from 表名 left join 表名2 on 条件


-- 右外链接，右侧的表完全显示，就是右外连接
  select 字段名... from 表名 right join 表名2 on 条件
  select ? from `stu` left join `score` on stu.id = score.id;

-- 完全外连接，完全显示2个表，没有匹配的记录设置为空







