         <div class="col-sm-12">
                <div class="col-sm-3">
                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoLocal->name}}</label>
                    </div>
                    <div class="col-xs-4">
                        <div id=""
                             style="height:40px; width:40px; background:url({{$EquipoLocal->getImageUrl()}});  background-size:cover;"></div>
                    </div>
                </div>

                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" value="0" name="LocalInput" class="col-md-2 form-control" id="usr">
                </div>
                <div class="col-xs-1">
                    <a>VS</a>
                </div>
                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" value="0" name="VisitorInput" class="col-md-2 form-control" id="usr">
                </div>

                <div class="col-sm-3">
                    <div class="col-xs-4">
                        <div id="" style="height:40px; width:40px; background:url({{$EquipoVisitante->getImageUrl()}});  background-size:cover;"></div>
                    </div>

                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoVisitante->name}}</label>
                    </div>

                </div>

            </div>
