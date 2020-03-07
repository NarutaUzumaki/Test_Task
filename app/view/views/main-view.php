<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background-color: #31373e; color: white;">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Бухгалтерия</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/operation/create">Создать запись</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span class="navbar-text">
                    <?php echo "Вы вошли как ".$_SESSION['user']->getName(); ?>
                </span>
                <span class="navbar-text" style="padding-left: 5%">
                    <a href="/user/signoutFromAcc">Выйти</a>
                </span>
            </form>
        </div>
    </nav>
</header>
    <div class="text-center" style="padding-top: 1%">
        <table class="table table-bordered table-dark">
            <thead>
                <th scope="col">№</th>
                <th scope="col">Запись</th>
                <th scope="col">Описание</th>
                <th scope="col">Денежная операция</th>
                <th scope="col">Дата/Время</th>
                <th scope="col">Манипуляция</th>
            </thead>
            <tbody>
                <?php foreach ($DBData as $key=>$operation):?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $operation->getTitle(); ?></td>
                        <td><?php echo $operation->getDescription(); ?></td>
                        <td style="background-color:
                            <?php if ($operation->getAmount()>0){echo 'DarkGreen';}else{echo'DarkRed';}?>">
                            <?php echo $operation->getAmount()." грн"; ?>
                        </td>
                        <td><?php echo $operation->getDate(); ?></td>
                        <td>
                            <a class="btn btn-info" href="/operation/edit?id=<?php echo $operation->getId(); ?>">Редактировать</a>
                            <a class ="btn btn-danger" onclick="return confirm('Удалить запись?')" href="/operation/delete?id=<?php echo $operation->getId(); ?>">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>