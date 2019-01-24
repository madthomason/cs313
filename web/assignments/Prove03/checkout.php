<?php
require 'items.php';
require 'header.php';
?>

<form action="confirmation.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <select id="state">
            <option name="state" value="AL">Alabama</option>
            <option name="state" value="AK">Alaska</option>
            <option name="state" value="AZ">Arizona</option>
            <option name="state" value="AR">Arkansas</option>
            <option name="state" value="CA">California</option>
            <option name="state" value="CO">Colorado</option>
            <option name="state" value="CT">Connecticut</option>
            <option name="state" value="DE">Delaware</option>
            <option name="state" value="DC">District Of Columbia</option>
            <option name="state" value="FL">Florida</option>
            <option name="state" value="GA">Georgia</option>
            <option name="state" value="HI">Hawaii</option>
            <option name="state" value="ID">Idaho</option>
            <option name="state" value="IL">Illinois</option>
            <option name="state" value="IN">Indiana</option>
            <option name="state" value="IA">Iowa</option>
            <option name="state" value="KS">Kansas</option>
            <option name="state" value="KY">Kentucky</option>
            <option name="state" value="LA">Louisiana</option>
            <option name="state" value="ME">Maine</option>
            <option name="state" value="MD">Maryland</option>
            <option name="state" value="MA">Massachusetts</option>
            <option name="state" value="MI">Michigan</option>
            <option name="state" value="MN">Minnesota</option>
            <option name="state" value="MS">Mississippi</option>
            <option name="state" value="MO">Missouri</option>
            <option name="state" value="MT">Montana</option>
            <option name="state" value="NE">Nebraska</option>
            <option name="state" value="NV">Nevada</option>
            <option name="state" value="NH">New Hampshire</option>
            <option name="state" value="NJ">New Jersey</option>
            <option name="state" value="NM">New Mexico</option>
            <option name="state" value="NY">New York</option>
            <option name="state" value="NC">North Carolina</option>
            <option name="state" value="ND">North Dakota</option>
            <option name="state" value="OH">Ohio</option>
            <option name="state" value="OK">Oklahoma</option>
            <option name="state" value="OR">Oregon</option>
            <option name="state" value="PA">Pennsylvania</option>
            <option name="state" value="RI">Rhode Island</option>
            <option name="state" value="SC">South Carolina</option>
            <option name="state" value="SD">South Dakota</option>
            <option name="state" value="TN">Tennessee</option>
            <option name="state" value="TX">Texas</option>
            <option name="state" value="UT">Utah</option>
            <option name="state" value="VT">Vermont</option>
            <option name="state" value="VA">Virginia</option>
            <option name="state" value="WA">Washington</option>
            <option name="state" value="WV">West Virginia</option>
            <option name="state" value="WI">Wisconsin</option>
            <option name="state" value="WY">Wyoming</option>
        </select>
    </div>
    <div class="form-group">
        <label for="zip">Zipcode</label>
        <input type="text" class="form-control" id="zip" name="zip">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 1/23/2019
 * Time: 5:10 PM
 */

