<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Salary</th>
        <th colspan="2">Edit \ Delete</th>
    </tr>
    </thead>
    <?php
    extract($data);
    foreach ($workers_arr as $worker_data){
        ?>
        <tr>
            <td><?=$worker_data['id']?></td>
            <td><?=$worker_data['name']?></td>
            <td><?=$worker_data['age']?></td>
            <td><?=$worker_data['salary']?></td>
            <td>
                <a href="/main/edit/?id=<?=$worker_data['id']?>" class="edit_btn" data="<?=$worker_data['id']?>">Edit</a>
            </td>
            <td>
                <a href="/main/delete/?id=<?=$worker_data['id']?>" class="del_btn">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<div><a href="/main/add" class="add_btn" >Add</a></div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" type="text/javascript"></script>
    <script  src="../assets/js/index.js" type="module"></script>

