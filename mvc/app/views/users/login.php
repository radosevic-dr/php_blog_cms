<?php
include APP_ROOT . '/views/includes/header.php';
?>

<div class="w-[30rem] mt-10 mx-auto border rounded-xl border-slate-400 py-5">
  <?php flash("Register success"); ?>
  <h1 class="text-center text-3xl font-bold mb-2">Login</h1>

  <form action="" method="POST" class=" mx-auto flex flex-col gap-5 items-center">
    <input type="email" name="email" placeholder="example@email.com" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['email_err'])) ? 'input-error' : 'input-info'; ?>" />
    <span class="<?php echo (!empty($data['email_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['email_err']; ?></span>

    <input type="password" password="password" placeholder="********" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['password_err'])) ? 'input-error' : 'input-info'; ?>" />
    <span class="<?php echo (!empty($data['password_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['password_err']; ?></span>

    <div class="flex justify-between gap-3 items-center">
      <input type="submit" name="login" class="btn btn-outline btn-info" value="Login" />

      <span class="flex flex-col gap-1 text-center" >Need an account?<a class="text-warning hover:font-bold hover:cursor-pointer" href="<?php echo URL_ROOT; ?>/users/register">Register</a></span>
    </div>
  </form>
</div>

  <?php include APP_ROOT . '/views/includes/footer.php' ?>