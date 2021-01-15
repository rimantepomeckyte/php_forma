<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="view/css/bootstrap.min.css"


</head>
<body>
<div class="container">
    <section>
        <?php if (isset($_POST['send'])): ?>
        <h2>Formos duomenys</h2>
        <?php
          $errors = [
            "Vardas/pavarde turi prasideti didziaja raide",
            "Blogai ivesta zinute"
        ];
          $validation_errors=[];?>

      <?php if (!preg_match('/^[A-Z]/', $_POST['name'])): ?>
        <?php $validation_errors = "Blogai ivestas vardas";?>
          <li> <?=$validation_errors?></li>
        <?php endif ?>
        <?php if (!preg_match('/^[A-Z]/', $_POST['lastname'])): ?>
            <?php $validation_errors = "Blogai ivesta pavarde";?>
            <li> <?=$validation_errors?></li>
        <?php endif ?>
        <?php if (!preg_match('{1,200}', $_POST['message'])): ?>
            <?php $validation_errors = "Blogai parasyta zinute";?>
            <li> <?=$validation_errors?></li>
        <?php endif ?>

            <?php foreach ($_POST as $field => $value): ?>
                <?php if ($field != "send" & !$validation_errors): ?>
                    <li><span><?= ucfirst($field); ?>: </span><?= $value ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
    </section>
    <?php else: ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Vardas:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Pavarde:</label>
                <input type="text" name="lastname" id="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <select class="form-control" id="departmentsselect" name="departament">
                    <option value="" disabled selected>--Pasirinkite departamenta</option>
                    <?php for ($i = 0; $i < count($company); $i++): ?>
                        <option><?= $company[$i]; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Zinute:</label>
                <input type="text" name="message" id="message" class="form-control">
            </div>

            <button type="submit" name="send" id="send" class="mt-3 btn btn-primary btn-lg text-center">Siusti</button>
        </form>
    <?php endif; ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
