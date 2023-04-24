--- A list of the best of each table---

---Newest Or Latest products
SELECT * FROM `tbl_products` 
ORDER BY Id DESC
LIMIT 10

---Oldest products
SELECT * FROM `tbl_products` 
ORDER BY Id Asc
LIMIT 10

---most expensive product
SELECT * FROM 'tbl_products'
ORDER BY Price DESC
LIMIT 10

---Cheaper product
SELECT * FROM 'tbl_products'
ORDER BY Price Asc
LIMIT 10

