## ThinkPHP

### 描述
$query = (new UserModel);
...// construct query condition 

so I need find all counts and paginate.So I use `$query->select()`; It can work,but `$query->count`;can't  work;
even I use `$query2 = (clone)$query`; `$query2->count()` can't work also.