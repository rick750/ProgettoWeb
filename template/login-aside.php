<div class="text-center">
    <h2 class="fw-bold">Sei già registrato?</h2>
    <form action="login.php" method="POST">
        <fieldset>
            <label for="email" class="form-text-label">Mail istituzionale</label><br />
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>">
            <br /><br />
            <label for="password" class="form-text-label">Password</label><br />
            <input type="password" id="password" name="password"><br /><br />
        </fieldset>
        <input type="submit" value="Accedi" class="btn btn-primary rounded-pill px-4">
        <input type="reset" value="Cancella" class="btn btn-primary rounded-pill px-4">
    </form>
</div>
