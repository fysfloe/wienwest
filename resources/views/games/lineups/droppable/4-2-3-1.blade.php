<div id="4-2-3-1" class="droppable-lineup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">ST</span>
                    {!! Form::hidden('positions[st]', isset($lineup->st) ? $lineup->st : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">LOM</span>
                    {!! Form::hidden('positions[lom]', isset($lineup->lom) ? $lineup->lom : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">ZOM</span>
                    {!! Form::hidden('positions[zom]', isset($lineup->zom) ? $lineup->zom : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">ROM</span>
                    {!! Form::hidden('positions[rom]', isset($lineup->rom) ? $lineup->rom : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-2">
                <div class="droppable">
                    <span class="position">LDM</span>
                    {!! Form::hidden('positions[ldm]', isset($lineup->ldm) ? $lineup->ldm : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RDM</span>
                    {!! Form::hidden('positions[rdm]', isset($lineup->rdm) ? $lineup->rdm : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LV</span>
                {!! Form::hidden('positions[lv]', isset($lineup->lv) ? $lineup->lv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LIV</span>
                {!! Form::hidden('positions[liv]', isset($lineup->liv) ? $lineup->liv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RIV</span>
                {!! Form::hidden('positions[riv]', isset($lineup->riv) ? $lineup->riv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RV</span>
                {!! Form::hidden('positions[rv]', isset($lineup->rv) ? $lineup->rv : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">TW</span>
                    {!! Form::hidden('positions[tw]', isset($lineup->tw) ? $lineup->tw : null) !!}
                </div>
            </div>
        </div>
    </div>
</div>