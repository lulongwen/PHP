/**

聚合函数字段相加，一定要考虑空值 null
 */
 SUM() 一列求和

  MAX() 返回最大值

  MIN() 返回最小值

  AVG() 平均值
  
  平均值
  ROUND(AVG(grade, 0))

总条数
SELECT COUNT(drade) from student;
 count(*) 总数
  count(列名)

  select count(*) from `tb_name` where
  select count(*) as total from `tb_name`;

  select count(*) AS total, (math+chinese+english) AS 'score'
    from `stduent`
    where (math+chinese+english) > 250;


count 细节
  count(*) & count(列名)的区别
    count(*) 不会忽略 null空值
    count(列名) 忽略空值

  sum() 求和
    多列组合会忽略空值，解决方法 ifnull
    单列统计不报错，隐式添加了 ifnull(value, 0.0)



    avg() 平均值
    max() 最大值
    min() 最小值

    group by 分组
      需要过滤子句 配合 having

    1 先要完成分组
    2 二是过滤分组的数据

    select max(sal), min(sal), deptno, job
    form employee
    group by depto, job;

    显示部门平均工资低于 2000的部门号和它的平均工资
    select avg(sal) AS myavg, depto
      from employee
      group by depto
      having myavg < 2000;




日期函数
  current_date()
  current_time()
  current_timestamp()
  now()
