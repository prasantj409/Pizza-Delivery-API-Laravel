# Pizza Delivery API Laravel
 Backend in Laravel
 
 # Table Design
 
 # Pizza
ID PK
Name
Description
Price

# Customer
ID PK
fname
lname
phone
email
Address1
city
State
zip

# Order
ID PK
Customer_id   FK
Delivery_cost
Order_date

# Order_pizza  (Pivot table)
Order_id  PK   FK
Pizza_id  PK   FK
quantity
Total_price

Order_id and Pizza_id are composit key that form primary key.


