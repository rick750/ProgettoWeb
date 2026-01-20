<div class="justify-content-center">

    <h2 class="fw-bold text-center text-primary mb-4">
        Sei già registrato?
    </h2>

    <form action="login.php" method="POST">

        <div class="mb-3">
            <label class="form-label fw-semibold">Mail istituzionale:<input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>"></label>

        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password:<input type="password" name="password" class="form-control"></label>

        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
            <input type="submit" value="Accedi" class="btn btn-primary rounded-pill px-4">
            <input type="reset" value="Cancella" class="btn btn-secondary rounded-pill px-4">
        </div>
    </form>
</div>