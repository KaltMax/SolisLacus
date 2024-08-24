<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Buchen</h1>
                    </div>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" name="room_type" required>
                                        <option value="" selected hidden>Zimmerauswahl</option>
                                        <option value="singleRoom">Einzelzimmer</option>
                                        <option value="doubleRoom">Doppelzimmer</option>
                                        <option value="luxuryRoom">Luxus-Doppelzimmer</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Rooms</span>
                                    <span class="error"><?php echo $roomTypeError;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="check_in" required>
                                    <span class="form-label">Check In</span>
                                    <span class="error"><?php echo $checkInError;?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="check_out" required>
                                    <span class="form-label">Check out</span>
                                    <span class="error"><?php echo $checkOutError;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="breakfast" required>
                                        <option value="" selected hidden>Frühstück</option>
                                        <option value="withBreakfast">Mit Frühstück</option>
                                        <option value="withoutBreakfast">Ohne Frühstück</option>
                                    </select>
                                    <span class="error"><?php echo $breakfastError;?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="parking" required>
                                        <option value="" selected hidden>Parkplatz</option>
                                        <option value="withParking">Mit Parkplatz</option>
                                        <option value="withoutParking">Ohne Parkplatz</option>
                                    </select>
                                    <span class="error"><?php echo $parkingError;?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control"name="pet" required>
                                        <option value="" selected hidden>Haustier</option>
                                        <option value="withPet">Mit Haustier</option>
                                        <option value="withoutPet">Ohne Haustier</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                    <span class="form-label">Pet</span>
                                    <span class="error"><?php echo $petError;?></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submit-btn" name="submit" value="submit">Jetzt Buchen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
