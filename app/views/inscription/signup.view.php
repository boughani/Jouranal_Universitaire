<form method="POST"  enctype="multipart/form-data">
    <div class="form-row">
    <div class="form-group col-md-12">
        <label for="username">UserName</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="username" REQUIRED>
    </div>
    <div class="form-group col-md-6">
        <label for="password">password</label>
        <input type="password" name="password"  class="form-control" id="password" placeholder="Password" REQUIRED>
    </div>
    <div class="form-group col-md-6">
        <label for="Confirme">Confirme Password</label>
        <input type="password" name="cpassword"  class="form-control" id="confirme" placeholder="password confirme" REQUIRED>
    </div>
    <div class="form-group col-md-6">
        <label for="email">Email address</label>
        <input type="email" name="email"  class="form-control" id="email" placeholder="your email" REQUIRED>
    </div>
        <div class="form-group col-md-6">

        <label for="birthday">Birthday:</label>
        <input type="date" class="form-control" id="birthday" name="dob" REQUIRED>
        </div>
        <div class="form-group col-md-6">
            <label for="FirstName">FirstName</label>
            <input type="text" name="firstname"  class="form-control" id="FirstName" placeholder="first name" REQUIRED>
        </div>
        <div class="form-group col-md-6">
            <label for="phone">phone</label>
            <input type="text" name="phone"  class="form-control" id="phone" placeholder="phone" REQUIRED>
        </div>
        <div class="form-group col-md-6">
            <label for="LastName">LastName</label>
            <input type="text"  name="lastname" class="form-control" id="LastName" placeholder="Last Name" REQUIRED>
        </div>


    </div>
    <button type="submit" name="submit" value='submit' class="btn btn-primary "> Inscrire</button>
</form>