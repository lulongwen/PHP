-- product 商品表
DROP TABLE IF EXISTS `product`; 
CREATE TABLE `product` ( 
	`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT, 
	`name` varchar(20) NOT NULL COMMENT 'product name', 
	`price` float(10,3) NOT NULL, 
	`description` varchar(20) DEFAULT NULL, 
	`count` int(11) NOT NULL DEFAULT '0', 
	`sid` int(11) unsigned NOT NULL, 
 	PRIMARY KEY (`id`), 
 	UNIQUE KEY `id_index` (`id`) USING HASH, 
 	UNIQUE KEY `sid_index` (`sid`) USING HASH 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 


-- supplier 供货商，厂商有工厂
-- vendor 物流上的供货商
DROP TABLE IF EXISTS `sealer`; 
CREATE TABLE `sealer` ( 
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
 `name` varchar(30) NOT NULL, 
 `city` varchar(255) DEFAULT NULL, 
 `created_time` datetime DEFAULT NULL, 
 `updated_time` datetime DEFAULT NULL, 
 `level` int(11) NOT NULL DEFAULT '0', 
 `description` varchar(40) DEFAULT NULL, 
 PRIMARY KEY (`id`), 
 UNIQUE KEY `id_index_1` (`id`) USING HASH 
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8; 


-- 关联product.sid 至 sealer.id
alter table `product' 
	add CONSTRAINT `fk_product` FOREIGN KEY (`sid`) 
	REFERENCES `sealer` (`id`)
	ON DELETE NO ACTION ON UPDATE NO ACTION 






