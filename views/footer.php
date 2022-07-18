<style>
    form.mailst {
    width: 600px;
    height: 150px;
    color: white;
    
    
    margin-left: 50px;
    border-radius: 7px;
    margin-bottom: 100px;
}
</style>
<footer class="py-5 bg-dark">

    

    <label for="" style="color: white; margin-left: 50px;">Have a question? Send us a message</label>
    <p></p>


    <form class="mailst" action="../Mailer/email.php" method="POST">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea name="msg" class="form-control" id="msg" rows="3"></textarea>
        </div>
    

        <button type="submit" class="btn btn-light">Send</button>
    </form>
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Sether Corp</p>
    </div>
</footer>