<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DummyResource\Pages;
use App\Filament\Resources\DummyResource\RelationManagers;
use App\Models\Dummy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DummyResource extends Resource
{
    protected static ?string $model = Dummy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $default = <<<EOT
<p>in arcu condimentum venenatis. Curabitur pharetra ac sem a commodo. Proin ut pharetra metus, ut vulputate diam. Curabitur malesuada feugiat nisi. Sed vitae diam at eros rhoncus ornare non in metus. Praesent cursus ac felis id pharetra.</p><p style="font-style: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; margin: 0px 0px 15px; padding: 0px; text-align: justify; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;; text-align: justify"></p><pre class="hljs"><code>&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;

&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Vue.JS 3&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    
        #app {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
    
        input#add-course {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
    
        button {
            background-color: #42b983;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    
        button:hover {
            background-color: #369b72;
        }
    
        ul {
            list-style-type: none;
            padding: 0;
        }
    
        li {
            background-color: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    &lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;
    &lt;div id="app"&gt;
        &lt;input id="add-course" v-model="newCourse" placeholder="Add course..."&gt;
        &lt;button @click="addCourse"&gt;Add a course&lt;/button&gt;
        &lt;ul&gt;
            &lt;li v-for="(course, key) of courses" :key="key"&gt;
                {{ course }}
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;
    &lt;script type="module"&gt;
        import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
        createApp({
            data() {
                return {
                    courses:['aaaa', 'bbbb'],
                    newCourse:''
                }
            },
            methods: {
                addCourse() {
                    this.courses.push(this.newCourse)
                    this.newCourse = ''
                }
            }
        }).mount('#app')
    &lt;/script&gt;
&lt;/body&gt;

&lt;/html&gt;</code></pre><p></p><p style="font-style: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; margin: 0px 0px 15px; padding: 0px; text-align: justify; caret-color: rgb(0, 0, 0); color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;; text-align: justify"></p>
EOT;
        return $form
            ->schema([TiptapEditor::make('content')
                ->profile('default')
                ->default($default)
                // ->disk('string') // optional, defaults to config setting
                // ->directory('string or Closure returning a string') // optional, defaults to config setting
                //->acceptedFileTypes() // optional, defaults to config setting
                // ->maxFileSize('integer in KB') // optional, defaults to config setting
                ->output(TiptapOutput::Json) // optional, change the format for saved data, default is html
                ->maxContentWidth('5xl')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDummies::route('/'),
            'create' => Pages\CreateDummy::route('/create'),
            'edit' => Pages\EditDummy::route('/{record}/edit'),
        ];
    }
}
