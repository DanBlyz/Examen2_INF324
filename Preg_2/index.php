<?php include 'header.php'; ?>
<div class="vh-100 d-flex justify-content-center align-items-center">
  <div class="col-md-4 p-5 shadow-sm border rounded-3">
      <h2 class="text-center mb-4 text-primary">Inicio de Sesion</h2>
      <form method="GET" action="indexcontrol.php">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Usuario</label>
              <input type="text" name="usuario" class="form-control border border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control border border-primary" id="exampleInputPassword1">
          </div>
          <div class="d-grid">
              <button class="btn btn-primary" type="submit">Ingresar</button>
          </div>
      </form>
  </div>
</div>

<?php include 'footer.php'; ?>
    