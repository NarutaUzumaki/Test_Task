<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Редактирование записей</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background-color: #31373e; color: white;">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Редактироваине записи</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/operation/index">На Главную <span class="sr-only">(current)</span></a>
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
<div style="padding: 1%">
    <form method="post" action="/operation/updateOperation?id=<?php echo $DBData->getId(); ?>">
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Название</label>
                <div>
                    <input class="form-control" type="text" name="title" value="<?php echo $DBData->getTitle(); ?>">
                </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label"> Описание</label>
                <div>
                    <input class="form-control" type="text" name="description" value="<?php echo $DBData->getDescription(); ?>" required>
                </div>
        </div>
        <div>Если операция убыточна, используйте знак минус</div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Операция</label>
                <div>
                    <input class="form-control" type="text" name="amount" value="<?php echo $DBData->getAmount(); ?>" required>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Дата</label>
                <div>
                    <input class="form-control" type="date" name="date" value="<?php echo $DBData->getDate()->format('Y-m-d'); ?>">
                </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">Время</label>
                <div>
                    <input class="form-control" type="time" name="time" value="<?php echo $DBData->getDate()->format('H:i:s'); ?>">
                </div>
        </div>
        <button class="btn btn-success" type="submit">Редактировать</button>
    </form>
</div>
</body>