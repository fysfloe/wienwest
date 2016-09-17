<div id="4-3-3" class="droppable-lineup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable back">
                    <span class="position">LF</span>
                    {!! Form::hidden('positions[lf]', isset($lineup->lineup->lf) && $lineup->mode == '4-3-3' ? $lineup->lineup->lf : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">ST</span>
                    {!! Form::hidden('positions[st]', isset($lineup->lineup->st) && $lineup->mode == '4-3-3' ? $lineup->lineup->st : null) !!}
                </div>
            </div>
            <div class="col-md-4 back">
                <div class="droppable">
                    <span class="position">RF</span>
                    {!! Form::hidden('positions[rf]', isset($lineup->lineup->rf) && $lineup->mode == '4-3-3' ? $lineup->lineup->rf : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">LM</span>
                    {!! Form::hidden('positions[lm]', isset($lineup->lineup->lm) && $lineup->mode == '4-3-3' ? $lineup->lineup->lm : null) !!}
                </div>
            </div>
            <div class="col-md-4 back">
                <div class="droppable">
                    <span class="position">ZM</span>
                    {!! Form::hidden('positions[zm]', isset($lineup->lineup->zm) && $lineup->mode == '4-3-3' ? $lineup->lineup->zm : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RM</span>
                    {!! Form::hidden('positions[rm]', isset($lineup->lineup->rm) && $lineup->mode == '4-3-3' ? $lineup->lineup->rm : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LV</span>
                {!! Form::hidden('positions[lv]', isset($lineup->lineup->lv) && $lineup->mode == '4-3-3' ? $lineup->lineup->lv : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">LIV</span>
                {!! Form::hidden('positions[liv]', isset($lineup->lineup->liv) && $lineup->mode == '4-3-3' ? $lineup->lineup->liv : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">RIV</span>
                {!! Form::hidden('positions[riv]', isset($lineup->lineup->riv) && $lineup->mode == '4-3-3' ? $lineup->lineup->riv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RV</span>
                {!! Form::hidden('positions[rv]', isset($lineup->lineup->rv) && $lineup->mode == '4-3-3' ? $lineup->lineup->rv : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">TW</span>
                    {!! Form::hidden('positions[tw]', isset($lineup->lineup->tw) && $lineup->mode == '4-3-3' ? $lineup->lineup->tw : null) !!}
                </div>
            </div>
        </div>
    </div>
</div>