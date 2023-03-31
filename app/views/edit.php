<form  method="post" action="/main/update" >
    <?php
    extract($data);
    foreach ($workers_arr as $worker_data){
        ?>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?=$worker_data['name']?>">
    </div>
    <div class="input-group">
        <label>Age</label>
        <input type="number" name="age" value="<?=$worker_data['age']?>">
    </div>
    <div class="input-group">
        <label>Salary</label>
        <input type="number" name="salary" value="<?=$worker_data['salary']?>">
    </div>
        <input type="hidden" id="workerId" name="workerId" value="<?=$worker_data['id']?>">
    <div class="input-group ">
        <button class="btn" type="submit" >Update</button>
    </div>

        <?php
    }
    ?>
</form>

<style>
    body {font-size: 19px;}
    form {width: 33%;margin: 50px auto;text-align: left;padding: 30px; border: 1px solid #bbbbbb;border-radius: 10px;}
    .input-group {margin: 10px 0px 10px 0px;}
    .input-group label {display: block;text-align: left;margin: 3px;}
    .input-group input {height: 40px;width: 93%;padding: 5px 10px;font-size: 16px;border-radius: 5px;border: 1px solid gray;}
    .btn {padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;}
</style>

