/*Total sales*/
/*SELECT p.Product_ID, p.Product_Name, SUM(od.Total_Amount) AS Total_Sales_Amount, COUNT(od.Order_ID) AS Total_Orders, 
       SUM(od.Total_Amount) AS Total_Revenue
FROM Product p
LEFT JOIN Order_Product op ON p.Product_ID = op.Product_ID
LEFT JOIN Order_Detail od ON op.Order_ID = od.Order_ID
WHERE p.Shop_ID = :Trader_ID;
GROUP BY p.Product_ID, p.Product_Name;*/



SELECT p.Product_ID, p.Product_Name, p.Stock_Available
FROM Product p
JOIN Shop s ON p.Shop_ID = s.Shop_ID
WHERE s.Trader_ID = :Trader; 
/*WHERE s.Trader_ID = :202;*/



/*Product best selling product*/
SELECT p.Product_ID, p.Product_Name, COUNT(op.Product_ID) AS Units_Sold
FROM Product p
LEFT JOIN Order_Product op ON p.Product_ID = op.Product_ID
LEFT JOIN Order_Detail od ON op.Order_ID = od.Order_ID
WHERE p.Shop_ID =401
GROUP BY p.Product_ID, p.Product_Name
ORDER BY Units_Sold DESC;



/*Montly sales report*/
SELECT TO_CHAR(od.Order_Date, 'YYYY-MM') AS Month,
       p.Product_Name,
       SUM(op.Quantity) AS Total_Sold
FROM Order_Detail od
JOIN Order_Product op ON od.Order_ID = op.Order_ID
JOIN Product p ON op.Product_ID = p.Product_ID
JOIN Shop s ON p.Shop_ID = s.Shop_ID
WHERE s.Trader_ID = :Trader_ID
GROUP BY TO_CHAR(od.Order_Date, 'YYYY-MM'), p.Product_Name
ORDER BY Month, p.Product_Name;


/* Weekly sales report  of product*/
SELECT TO_CHAR(od.Order_Date, 'W') AS Week,
       TO_CHAR(od.Order_Date, 'YYYY') AS Year,
       p.Product_Name,
       SUM(op.Quantity) AS Total_Sold
FROM Order_Detail od
JOIN Order_Product op ON od.Order_ID = op.Order_ID
JOIN Product p ON op.Product_ID = p.Product_ID
JOIN Shop s ON p.Shop_ID = s.Shop_ID
WHERE s.Trader_ID = :Trader_ID
GROUP BY TO_CHAR(od.Order_Date, 'W'), TO_CHAR(od.Order_Date, 'YYYY'), p.Product_Name
ORDER BY Year, Week, p.Product_Name;


/* Yearly sales report  of product*/
SELECT TO_CHAR(od.Order_Date, 'YYYY') AS Year,
       p.Product_Name,
       SUM(op.Quantity) AS Total_Sold
FROM Order_Detail od
JOIN Order_Product op ON od.Order_ID = op.Order_ID
JOIN Product p ON op.Product_ID = p.Product_ID
JOIN Shop s ON p.Shop_ID = s.Shop_ID
WHERE s.Trader_ID = :Trader_ID
GROUP BY TO_CHAR(od.Order_Date, 'YYYY'), p.Product_Name
ORDER BY Year, p.Product_Name;
