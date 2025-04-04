<details open>
    <summary
        style="margin-top:10px;font-weight:bold;font-size:19px; background-color: green;color:white; padding: 10px; cursor: pointer;opacity:0.8">
        Jquery Questions
    </summary>

    @php
        $jqueryQuestions = [
            [
                'sort' => 1,
                'label' => 'Find the First Non-Repeating Character in a String'
            ], [
                'sort' => 2,
                'label' => 'Flatten a Nested Array'
            ], [
                'sort' => 3,
                'label' => 'Implement a Promise-based Sleep Function'
            ], [
                'sort' => 4,
                'label' => 'Shuffle an Array Randomly'
            ], [
                'sort' => 5,
                'label' => 'Implement a Simple jQuery Plugin',
                'closure' => function(){
                    return '<p> I already implemented multple plugins: codemirror, highlighter and jquery</p>';
                }
            ], [
                'sort' => 6,
                'label' => 'Fetch Data Using jQuery AJAX',
                'closure' => function(){
                    return '<p> I already implemented: Please visit <code class="badge">view/batch-progree-ui.blade.php</code></p>';
                }
            ], [
                'sort' => 7,
                'label' => 'Upload a file on a button click using jQuery without form',
                'closure' => function(){
                    return '

                    <div style="display: flex;flex-direction: row;align-items: center;margin-top:10px">
                        <input type="file" id="profile_image">
                        <img src="'.asset('storage/'.auth()->user()->image_url).'" alt="image" id="image_prev" style="width: 100px;height: 100px;border-radius:9px">
                    </div>

                    <button id="upload" style="margin-top: 10px">Upload</button>

                    <div style="margin-top:10px" id="image_message"> </div>
                    
                    ';
                }
            ], [
                'sort' => 8,
                'label' => 'jQuery get all siblings data',
            ], [
                'sort' => 9,
                'label' => 'jQuery add dynamic field and get that dynamic field value',
                'closure' => function(){
                    return '<p> I already implemented: Please visit <code class="badge">view/questions/index.blade.php</code></p>';
                }
            ], [
                'sort' => 10,
                'label' => ' jQuery/JS hide a dropdown on click somewhere else',
                'closure' => function(){
                    return '

                    <p> Have to first run this code for implement this functionality</p>
                    
                    <p> NOTE:: You can show hidden dropdown after run again </p>

                     <div style="display: flex;flex-direction: row;align-items: center;margin-top:10px">
                       <select id="hide-dropdown"> 
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    
                    ';
                },
                'editor_with_closure' => true,
                'output_hide' => true
            ]
        ];
    @endphp

    <ul>
        @php $outputIndex = 0; @endphp
        
        @foreach ($jqueryQuestions as $index => $question)
            <li style="">
                <b>{{ $question['sort'] . '. ' . $question['label'] }}</b>

                @if (! array_key_exists('closure', $question) || $question['editor_with_closure'] ??= false)
                    <div id="editor" class="editor" style="min-height: 180px;margin:15px 0px 15px 0px"></div>

                    <hr>

                    <button class="run" style="margin:20px 0px 20px 0px" data-index="{{$outputIndex}}" >Run</button> <br>

                    @if (! $question['output_hide']??= false)
                        <label> Output </label>

                        {{-- Code highligter --}}
                        <pre style="margin:0px 0px 0px 0px !important">
                            <code class="javascript" id="output-{{$outputIndex}}">// output here</code>
                        </pre>
                    @endif

                    @php $outputIndex++; @endphp
                @endif

                @if (array_key_exists('closure', $question))
                    {!! $question['closure']() !!}
                @endif
            </li>
        @endforeach
    </ul>
</details>