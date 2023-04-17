Select * From Users
Where Status='Active' 

Select * From Users
Where Status='DisActive' 

Select * From Customers
Where Status='Active' 

Select * From Customers
Where Status='DisActive' 

-- Search Start With Anything
Select * From Products
Where Code Like 'anything%'


-- Exactly the search term
Select * From Products
Where Code Like '%anything%'


-- Search End With Anything
Select * From Products
Where Code Like '%anything'
