<x-components.header title="Post"/>

<br>
    <form class="align-middle " method="POST" >
        @csrf

        <label for="text" class="form-label" >Position</label>
        <input type="text" class="form-control " id="position" name="position">
        <br> <br>

        <label for="text" class="form-label">Company</label>
        <input type="text" class="form-control" id="company" name="company">
        <br> <br>

        <label for="text" class="form-label">Experience</label>
        <input type="text" class="form-control" id="experience" name="experience">
        <br> <br>

        <label for="text" class="form-label">Skills</label>
        <input type="text" class="form-control" id="skills" name="skills">
        <br> <br>
        
        <div class="form-floating">
            <label for="text" class="form-label">Description</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" 
            style="height: 100px" name="description"></textarea>
        </div> <br> <br>
        
        <label for="text" class="form-label">Locatiom</label>
        <input type="text" class="form-control" id="location" name="location">
        <br> <br>
        <label for="text" class="form-label">Salary</label>
        <input type="text" class="form-control" id="salary" name="salary">
        <br> <br>
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<x-components.footer/>
