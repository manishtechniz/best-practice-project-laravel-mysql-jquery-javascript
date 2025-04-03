<details open>
    <summary
        style="margin-top:10px;font-weight:bold;font-size:19px; background-color: green;color:white; padding: 10px; cursor: pointer;opacity:0.8">
        MYSQL Questions</summary>
    @php
        $MYSQLQuestions = [
            [
                'sort' => '1',
                'label' => 'Find the Nth Highest Salary Without Using LIMIT',
                'closure' => function () {
                    return 'select salary from employees e1 
where <N-1> = (select count(*) from employees e2 where e2.salary > e1.salary)';
                },
            ], [
                'sort' => '2',
                'label' => 'Retrieve All Employees Who Joined in the Last 30 Days',
                'closure' => function () {
                    return 'select * from employees where datediff(now(), hire_date) <= 30';
                },
            ], [
                'sort' => '3',
                'label' => 'Find the Employees Who Earn More Than Their Department\'s Average Salary',
                'closure' => function () {
                    return 'select * from employees e1 
where e1.salary > (select avg(salary) 
    from employees e2 
    group by department_id 
    having e2.department_id = e1.department_id
)';
                },
            ], [
                'sort' => '4',
                'label' => 'Convert a Comma-Separated String into Rows',
                'closure' => function () {
                    return 'not solved';
                },
            ], [
                'sort' => '5',
                'label' => 'Find the First Order for Each Customer',
                'closure' => function () {
                    return 'select * from orders order o1 
where user_id = (select distinct user_id from order o2 where o2.user_id =  o1.order_id) 
order by order_date asc 
limit 1';
                },
            ], [
                'sort' => '6',
                'label' => 'Get a Count of Orders Placed Each Day in the Last 7 Days',
                'closure' => function () {
                    return 'select count(*) as orders, order_date 
from orders 
having datediff(now, order_date) <= 7 group by order_date';
                },
            ], [
                'sort' => '7',
                'label' => 'Fetch customers if exists in orders table',
                'closure' => function () {
                    return 'select * from users where id in (select distinct user_id from orders)';
                },
            ], [
                'sort' => '8',
                'label' => 'Fetch customers with sum of amount, discount, total orders, total delivered order',
                'closure' => function () {
                    return 'select 
sum(amount) as total_amount,
sum(discount) as total_discount,
count(*) as total_orders,
sum(case when order_status = \'delivered\' then 1 else 0 end) as total_delivered_orders 
from orders';
                },
            ], [
                'sort' => '9',
                'label' => 'Retrieve all employees with sum of present days, leaves in current month',
                'closure' => function () {
                    return 'select
sum(case when status is present then 1 else 0 end) as total_presents,
sum(case when status is leaves then 1 else 0 end) as total_leaves
from employee_attendaces
where month(attendance_date) = month(curdate()) and year(attendance_date) = year(curdate())';
                },
            ], [
                'sort' => '10',
                'label' => 'Find the Top 3 Most Sold Products in the Last Mont',
                'closure' => function () {
                    return [
                        [
                            'label'=> 'Using nested query',
                            'query' => 'select * from products where id in (
    select product_id from orders
    where month(curdate - interval 1 month) = month(order_date) and year(curdate - interval 1 month) = year(order_date)
    group by product_id
    order by count(*) desc
    limit 3
)'
                        ], [
                            'label'=> 'Using join',
                            'query' => 'select * from products join (
    select product_id from orders
    where month(curdate - interval 1 month) = month(order_date) and year(curdate - interval 1 month) = year(order_date)
    group by product_id
    order by count(*) desc
    limit 3
) 
on orders.product_id = products.id'
                    ]
                ];
                },
                'loop' => true
            ],
        ];
    @endphp

    <ul>
        @foreach ($MYSQLQuestions as $question)
            <li>
                <b>{{ $question['sort'] . '. ' . $question['label'] }}</b>

                @if(empty($question['loop'])) 
                    <pre>
                        <code class="sql">{!! $question['closure']() !!}</code>
                    </pre>
                @else
                    <br><br>
                    @foreach ($question['closure']() as $index => $example)
                        Example: {{ ($index + 1) . '. ' . $example['label'] }}
                        <pre>
                            <code class="sql">{!! $example['query'] !!}</code>
                        </pre>
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>

</details>
