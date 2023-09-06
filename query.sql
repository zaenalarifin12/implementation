1. SELECT * FROM `employees` 
2. SELECT * FROM `employees` WHERE job_title = 'Manager' 
3. SELECT name, salary FROM `employees` WHERE department = 'Sales' OR department = 'Marketing'  
4. SELECT AVG(salary) FROM employees WHERE joined_date >= DATE_SUB(CURDATE(), INTERVAL 5 YEAR) 
5. SELECT e.employee_id, e.name, SUM(sd.sales) AS total_sales FROM employees e INNER JOIN sales_data sd ON e.employee_id = sd.employee_id GROUP BY e.employee_id, e.name ORDER BY total_sales DESC LIMIT 5 
6. WITH RankedSales AS ( SELECT e.name AS employee_name, e.job_title, e.salary, e.department, s.employee_id, SUM(s.sales) AS total_sales, RANK() OVER (ORDER BY SUM(s.sales) DESC) AS sales_rank FROM employees e INNER JOIN sales_data s ON e.employee_id = s.employee_id GROUP BY e.name, e.job_title, e.salary, e.department, s.employee_id ) SELECT employee_name, job_title, salary, department, total_sales, sales_rank FROM RankedSales ORDER BY sales_rank
