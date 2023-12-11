# layui template 返回日期格式
1. return util.toDateString(res.warning_time * 1000,"yyyy-MM-dd HH:mm:ss")

# layui radio 回显选中 
1. <input type="radio" name="type" value="1"  title="日常" {if condition="$data.type eq 1"}checked="" {/if}>

# layui select 回显选中
```angular2html
    <select name="group_id" class="layui-select" lay-verify="group_id">
         <option value="">没有选中任何项</option>
            {notempty name="group"}
                 {foreach name="group" item="vo"}
                      <option value="{$vo.id}" {if condition="$access.group_id eq $vo.id" }selected{/if}>{$vo.title}</option>
                 {/foreach}
            {/notempty}
    </select>
```