<!-- 
這段改加到導覽列的管理登出中了

<table width="100%">
    <tbody>
        <tr>
            <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a
                    href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
            //主要在下面這段加入 ./api/logout.php ，跟管理登出
            <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;./api/logout.php&#39;)"
                    style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
        </tr>
    </tbody>
</table> 
-->