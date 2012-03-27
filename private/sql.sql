--
-- Database: `edunation` (Group 6)
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` tinyint(3) unsigned NOT NULL,
  `user_session_id` char(32) NOT NULL,
  `product_type` enum('product','other') NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_type` (`product_type`,`product_id`),
  KEY `user_session_id` (`user_session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address1` varchar(80) NOT NULL,
  `address2` varchar(80) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` mediumint(5) unsigned zerofill NOT NULL,
  `phone` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `categories` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` tinytext,
  `image` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(1, 'Arts/Crafts', 'Art description here.', 'item2a.png');
INSERT INTO `categories` VALUES(2, 'Books/DVDs', 'Book/dvd description here.', 'item5a.png');
INSERT INTO `categories` VALUES(3, 'Decorations', 'Decoration description here.', 'item9b.png');
INSERT INTO `categories` VALUES(4, 'Games', 'Game description here.', 'item1a.png');
INSERT INTO `categories` VALUES(5, 'Teacher Aids', 'Teacher aid description here', 'item10b.png');

-- --------------------------------------------------------



--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(3) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `brand` varchar(60) NOT NULL,
  `description` tinytext,
  `price` decimal(5,2) unsigned NOT NULL,
  `cost` decimal(5,2) unsigned NOT NULL,
  `feat1` varchar(50) NOT NULL,
  `feat2` varchar(50) NOT NULL,
  `feat3` varchar(50) NOT NULL,
  `image` varchar(45) NOT NULL,
  `is_featured` BOOLEAN NOT NULL DEFAULT  '0',
  `stock` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- Note doesn't set any items featured right now
INSERT INTO `products` (`id`, `name`, `brand`, `description`, `feat1`, `feat2`, `feat3`, `category_id`, `stock`, `cost`, `price`,`image`) VALUES
(1210001, 'Blockers!', 'Briarpatch Inc.', 'A minute of rules, then a lifetime of fun for the whole family! Play your tiles strategically to create the fewest number of groups...then block and capture to foil your opponents!  Develops strategic thinking, visual discrimination and social development.', 'Strategic Thinking', 'Visual Discrimination', 'Social Development', 4, 1000, 26.50, 31.35, 'item1.png'),
(1310001, 'Jumbo Chalk', 'Melissa & Doug', '10 ct. Colorful, chunky, triangular chalk sticks are easy to grasp and won''t roll away! Non-toxic chalk is great inside for chalkboards or paper, or outside for sidewalk fun! The unique shape will help develop the preferred grip for later writing skills.', 'Motor Skills', 'Creativity', 'Writing Skills', 1, 1000, 1.25, 2.55, 'item2.png'),
(1310002, 'Crayon Clas', 'Crayola LLC', 'Crayola® crayon Classpacks® are the economical, organized way to bring Crayola® quality to every class. They provide multiple crayon sets for convenient classroom and group use. Crayons provide true color, no piling, build up, or erasing of crayon layers — good lay down. Tip and barrel strong, durable, long lasting and economical. Double?wrapped for added strength with the color name on the label. Large size crayons measure 4" x 7/16" and are available in a sturdy, compartmentalized, convenient, re-usable Classpack®. Traditional crayon colors perfect for teaching color mixing. Non-toxic, AP Seal.— 8 colors', 'Creativity', 'Motor Skills', 'Writing Skills', 1, 1000, 50.55, 68.15, 'item3.png'),
(1310003, 'Brain Noodles', 'Brain Noodles', 'Brain Noodles® stems suit the learning style of tactile and visual learners. They enable the teacher to present oodles of concepts in fun new ways.  Contains 120 assorted Brain Noodles® stems ', 'Problem Solving', 'Creativity', 'Social Development', 1, 1000, 50.55, 96.95, 'item4.png'),
(1410001, 'Bizarre Animals', 'Carson Dellosa', 'Captivate the interest of your students who are reading below grade level or have reading disabilities, English Language Learners, or reluctant or discouraged readers! This book includes eight nonfiction, full-color graphic novels with an audio CD, a teacher''s guide with vocabulary lists and extension activities, and reproducible comprehension activities. The easy-to-read large print and colorful picture clues will build the confidence of your struggling students, motivating them to read!', 'Language Retention', 'Confidence', 'Recall', 2, 1000, 9.55, 15.00, 'item5.png'),
(1410002, 'Ben''s Dream', 'Houghton Mifflin', 'On a terrifically rainy day, Ben has a dream in which he and his house float by the monuments of the world, half submerged in flood-water.', 'Language Retention', 'Grammar Skills', '3rd Grade Reading', 2, 1000, 9.55, 15.15, 'item6.png'),
(1410003, 'Animal Babies', 'Macmillan/Mps', 'Brrrr - it''s freezing out there! Animal Babies in Polar Lands looks at six young animals that live in the coldest places on Earth. Families of harp seals, polar bears, walruses, penguins, wolves, and albatross are brought to life through a lively question-and-answer format that will charm young children as they learn about animals from chilly places.', 'Recall', 'Animal Classification', 'Visual Discrimination', 2, 1000, 2.55, 5.95, 'item7.png'),
(1210002, '200 Brain Games', 'Teacher Created', 'Tons of fun in one little box! Play independently or with a friend—in school, at home, or while traveling. Find the Hidden Meanings of visual word puzzles. Complete Comparisons (Analogies) like the ones that appear on standardized tests. Solve Word Workouts and respond to Math Madness. 200 game cards come with directions and ideas for variations and group play. For 1 or more players. Ages 8 & up.', 'Social Development', 'Problem Solving', 'Vocabulary', 4, 1000, 10.95, 16.45, 'item8.png'),
(1610001, 'Shelf Organizer', 'Pacon Corporation', 'Designed to handle the weight of heavier materials like reams of paper and books. The shelves measure 12-1/2" x 10" x 3". Easy to assemble.', 'Organizational Skills', 'Cleanliness', 'Sorting', 5, 1000, 19.50, 30.15, 'item10.png'),
(1510001, 'Adhesive Letters', 'Pacon Corporation', 'Easy to use - just peel and place! A unique adhesive makes these fade-resistant letters removable, repositionable and reusable. Adheres to any clean, dry surface that is smooth or lightly textured. Set includes uppercase letters with numbers and punctuation marks.', 'Letter Recognition', 'Familiarity', 'Visual Discrimination', 3, 1000, 5.00, 9.40, 'item9.png');


-- Set default featured products (Using first 5 for now)
UPDATE `products` SET `is_featured` = 1 WHERE `id`=1210001;
UPDATE `products` SET `is_featured` = 1 WHERE `id`=1310001;
UPDATE `products` SET `is_featured` = 1 WHERE `id`=1310002;
UPDATE `products` SET `is_featured` = 1 WHERE `id`=1310003;
UPDATE `products` SET `is_featured` = 1 WHERE `id`=1410001;

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `total` decimal(7,2) unsigned DEFAULT NULL,
  `shipping` decimal(5,2) unsigned NOT NULL,
  `credit_card_number` mediumint(4) unsigned NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `order_date` (`order_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  `price_per` decimal(5,2) unsigned NOT NULL,
  `ship_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ship_date` (`ship_date`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` mediumint(8) unsigned NOT NULL,
  `price` decimal(5,2) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `start_date` (`start_date`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

-- Blockers
INSERT INTO `sales` VALUES(1, 1210001, 26.99, '2010-08-16', NULL);

-- Jumbo Chalk
INSERT INTO `sales` VALUES(2, 1310001, 1.99, '2010-08-19', NULL);


-- --------------------------------------------------------


--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `type` varchar(18) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `response_code` tinyint(1) unsigned NOT NULL,
  `response_reason` tinytext,
  `transaction_id` bigint(20) unsigned NOT NULL,
  `response` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

/*
CREATE TABLE `wish_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` tinyint(3) unsigned NOT NULL,
  `user_session_id` char(32) NOT NULL,
  `product_type` enum('product','other','sale') DEFAULT NULL,
  `product_id` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_type` (`product_type`,`product_id`),
  KEY `user_session_id` (`user_session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
*/

-- -----------------------------
-- Stored Procedures --
-- -----------------------------

DELIMITER $$
DROP PROCEDURE IF EXISTS `select_categories` $$
CREATE PROCEDURE select_categories (cat TINYINT)
BEGIN
IF cat IS NULL THEN
	SELECT * FROM categories ORDER by name;
ELSE
	SELECT * FROM categories WHERE id=cat ORDER by name;
END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `select_products` $$
CREATE PROCEDURE select_products(cat TINYINT)
BEGIN
IF cat IS NULL THEN
	SELECT * FROM products ORDER by name ASC;
ELSE
	SELECT * FROM products WHERE category_id=cat ORDER by name ASC;
END IF;
END$$
DELIMITER ;

/*



-- get_all gets every column instead of just the main
DELIMITER $$
CREATE PROCEDURE select_sale_items (get_all BOOLEAN)
BEGIN
IF get_all = 1 THEN 
SELECT sa.price AS sale_price, ncc.category, ncp.image, ncp.name, ncp.price, ncp.stock, ncp.description 
FROM sales AS sa
WHERE ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) )
UNION SELECT CONCAT("C", sc.id), sa.price, prod.category, prod.image, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, gc.description 
FROM sales AS sa 
INNER JOIN products AS prod ON prod.id=sc.general_product_id 
AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) );

ELSE 
(SELECT CONCAT("O", ncp.id) AS sku, sa.price AS sale_price, ncc.category, ncp.image, ncp.name 
FROM sales AS sa 
INNER JOIN non_product_products AS ncp 
ON sa.product_id=ncp.id 
INNER JOIN non_product_categories AS ncc ON ncc.id=ncp.non_product_category_id 
WHERE sa.product_type="other" 
AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) 
ORDER BY RAND() LIMIT 2) UNION (SELECT CONCAT("C", sc.id), sa.price, gc.category, gc.image, 
CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole) 
FROM sales AS sa 
INNER JOIN specific_products AS sc ON sa.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN products AS gc ON gc.id=sc.general_product_id WHERE sa.product_type="product" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) ORDER BY RAND() LIMIT 2);
END IF;
END$$
DELIMITER ;



-- -----------------------------
-- Chapter 9: --
-- -----------------------------

DELIMITER $$
CREATE PROCEDURE update_cart (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT, qty TINYINT)
BEGIN
IF qty > 0 THEN
UPDATE carts SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
ELSEIF qty = 0 THEN
CALL remove_from_cart (uid, type, pid);
END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_to_cart (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT, qty TINYINT)
BEGIN
DECLARE cid INT;
SELECT id INTO cid FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
IF cid > 0 THEN
UPDATE carts SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
ELSE 
INSERT INTO carts (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE remove_from_cart (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT)
BEGIN
DELETE FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_shopping_cart_contents (uid CHAR(32))
BEGIN
SELECT CONCAT("O", ncp.id) AS sku, c.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM carts AS c INNER JOIN non_product_products AS ncp ON c.product_id=ncp.id INNER JOIN non_product_categories AS ncc ON ncc.id=ncp.non_product_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='other' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="other" AND c.user_session_id=uid UNION SELECT CONCAT("C", sc.id), c.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM carts AS c INNER JOIN specific_products AS sc ON c.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN products AS gc ON gc.id=sc.general_product_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='product' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="product" AND c.user_session_id=uid;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE update_wish_list (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT, qty TINYINT)
BEGIN
IF qty > 0 THEN
UPDATE wish_lists SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
ELSEIF qty = 0 THEN
CALL remove_from_wish_list (uid, type, pid);
END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_to_wish_list (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT, qty TINYINT)
BEGIN
DECLARE cid INT;
SELECT id INTO cid FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
IF cid > 0 THEN
UPDATE wish_lists SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
ELSE 
INSERT INTO wish_lists (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE remove_from_wish_list (uid CHAR(32), type VARCHAR(6), pid MEDIUMINT)
BEGIN
DELETE FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE get_wish_list_contents (uid CHAR(32))
BEGIN
SELECT CONCAT("O", ncp.id) AS sku, wl.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM wish_lists AS wl INNER JOIN non_product_products AS ncp ON wl.product_id=ncp.id INNER JOIN non_product_categories AS ncc ON ncc.id=ncp.non_product_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='other' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="other" AND wl.user_session_id=uid UNION SELECT CONCAT("C", sc.id), wl.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM wish_lists AS wl INNER JOIN specific_products AS sc ON wl.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN products AS gc ON gc.id=sc.general_product_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='product' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="product" AND wl.user_session_id=uid;
END$$
DELIMITER ;

-- -----------------------------
-- Chapter 10 --
-- -----------------------------

DELIMITER $$
CREATE PROCEDURE add_customer (e VARCHAR(80), f VARCHAR(20), l VARCHAR(40), a1 VARCHAR(80), a2 VARCHAR(80), c VARCHAR(60), s CHAR(2), z MEDIUMINT, p INT, OUT cid INT)
BEGIN
	INSERT INTO customers VALUES (NULL, e, f, l, a1, a2, c, s, z, p, NOW());
	SELECT LAST_INSERT_ID() INTO cid;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE add_order (cid INT, uid CHAR(32), ship DECIMAL(5,2), cc MEDIUMINT, OUT total DECIMAL(7,2), OUT oid INT)
BEGIN
	DECLARE subtotal DECIMAL(7,2);
	INSERT INTO orders (customer_id, shipping, credit_card_number, order_date) VALUES (cid, ship, cc, NOW());
	SELECT LAST_INSERT_ID() INTO oid;
	INSERT INTO order_contents (order_id, product_type, product_id, quantity, price_per) SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, ncp.price) FROM carts AS c INNER JOIN non_product_products AS ncp ON c.product_id=ncp.id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='other' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="other" AND c.user_session_id=uid UNION SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, sc.price) FROM carts AS c INNER JOIN specific_products AS sc ON c.product_id=sc.id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='product' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="product" AND c.user_session_id=uid;
	SELECT SUM(quantity*price_per) INTO subtotal FROM order_contents WHERE order_id=oid;
	UPDATE orders SET total = (subtotal + ship) WHERE id=oid;
	SELECT (subtotal + ship) INTO total;
	
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE add_transaction (oid INT, trans_type VARCHAR(18), amt DECIMAL(7,2), rc TINYINT, rrc TINYTEXT, tid BIGINT, r TEXT)
BEGIN
	INSERT INTO transactions VALUES (NULL, oid, trans_type, amt, rc, rrc, tid, r, NOW());
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE clear_cart (uid CHAR(32))
BEGIN
	DELETE FROM carts WHERE user_session_id=uid;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE get_order_contents (oid INT)
BEGIN
SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per) AS subtotal, ncc.category, ncp.name, o.total, o.shipping FROM order_contents AS oc INNER JOIN non_product_products AS ncp ON oc.product_id=ncp.id INNER JOIN non_product_categories AS ncc ON ncc.id=ncp.non_product_category_id INNER JOIN orders AS o ON oc.order_id=o.id WHERE oc.product_type="other" AND oc.order_id=oid UNION SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per), gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), o.total, o.shipping FROM order_contents AS oc INNER JOIN specific_products AS sc ON oc.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN products AS gc ON gc.id=sc.general_product_id INNER JOIN orders AS o ON oc.order_id=o.id  WHERE oc.product_type="product" AND oc.order_id=oid;
END$$
DELIMITER ;
*/
