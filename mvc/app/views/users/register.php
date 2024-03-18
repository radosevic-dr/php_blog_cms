<?php
include APP_ROOT . '/views/includes/header.php';
?>

<div class="w-[30rem] mt-10 mx-auto border rounded-xl border-slate-400 py-5">
  <h1 class="text-center text-3xl font-bold mb-2">Create an Account</h1>
  <p class="text-slate-500 text-center mb-5">Please fill out form to register</p>

  <?php
    
  ?>

  <form action="" method="POST" class="mx-auto flex flex-col gap-5 items-center">

    <input type="text" name="name" placeholder="Full Name" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['name_err'])) ? 'input-error' : 'input-info'; ?>"/>
    <span class="<?php echo (!empty($data['name_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['name_err'];?></span>

    <input type="email" name="email" placeholder="example@email.com" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['email_err'])) ? 'input-error' : 'input-info'; ?>" />
    <span class="<?php echo (!empty($data['email_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['email_err'];?></span>

    <input type="password" password="password" placeholder="********" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['password_err'])) ? 'input-error' : 'input-info'; ?>" />
    <span class="<?php echo (!empty($data['password_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['password_err'];?></span>

    <input type="password" name="confirm_password" placeholder="********" class="input input-bordered w-full max-w-xs <?php echo (!empty($data['confirm_password_err'])) ? 'input-error' : 'input-info'; ?>" />
    <span class="<?php echo (!empty($data['confirm_password_err'])) ? 'block text-error' : 'hidden'; ?>"><?php echo $data['confirm_password_err'];?></span>
    
    <div class="flex justify-between gap-3 items-center">
      <input type="submit" name="register" class="btn btn-outline btn-info" value="Register" />

      <span class="flex flex-col gap-1 text-center" >Have an account?<a class="text-success hover:font-bold hover:cursor-pointer" href="<?php echo URL_ROOT; ?>/users/login">Log in</a></span>
    </div>
  </form>
</div>

<?php include APP_ROOT . '/views/includes/footer.php'; ?>