<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>getReservation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script>
        (function() {

            //検索ボタン
            $(document).on('click', '#search-button', function(event) {
                $('#search-form').submit();
            });

            //新規作成ボタン
            $(document).on('click', '[name=create-button]', function(event) {
                var postURL = $(this).attr('data-href');
                location.href = postURL;
            });

            //スケジュール新規作成ボタン
            $(document).on('click', '[name=create-schedule-button]', function(event) {
                var postURL = $(this).attr('data-href');
                location.href = postURL;
            });

            //詳細ボタン
            $(document).on('click', '[name=detail-button]', function(event) {
                var postURL = $(this).attr('data-href');
                location.href = postURL;
            });

            //更新ボタン
            $(document).on('click', '[name=edit-button]', function(event) {
                var postURL = $(this).attr('data-href');
                location.href = postURL;
            });

            //削除ボタン
            $(document).on('click', '[name=delete-button]', function(event) {
                // event.preventDefault();
                var postURL = $(this).attr('data-href');
                $('#delete-reservation-form').attr('action', postURL);
                $(".delete_check_dialog").dialog({
                    title: "確認",
                    buttons: {
                        "キャンセル": function() {
                            $(this).dialog("close");
                        },
                        "実行": function() {
                            // location.href=postURL;
                            $('#delete-reservation-form').submit();
                        },
                    },

                });
            });



        }());
    </script>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('予約管理') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <button data-href="/admin/reservations/create" name="create-button" class="bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">新規作成</button>
                        <ul>
                            <table class="table-auto">
                                <tr>
                                    <th>ID</th>
                                    <th>映画タイトル</th>
                                    <th>日時</th>
                                    <th>スクリーン</th>
                                    <th>座席</th>
                                    <th>メールアドレス</th>
                                    <th>名前</th>
                                    <th>登録日時</th>
                                    <th>更新日時</th>
                                    <th>予約詳細</th>
                                    <th>予約削除</th>
                                </tr>
                                @foreach ($reservations as $reservation)

                                @php

                                @endphp
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->schedule->movie->title }}</td>
                                    <td>{{ $reservation->schedule->start_time }}～{{ $reservation->schedule->end_time }}</td>
                                    <td>{{ $reservation->sheet->screen->name }}</td>
                                    <td>{{ $reservation->sheet->row }}{{ $reservation->sheet->column }}</td>
                                    <td>{{ $reservation->email }}</td>
                                    <td>{{ $reservation->name }}</td>
                                    <td>{{ $reservation->created_at }}</td>
                                    <td>{{ $reservation->updated_at }}</td>
                                    <td><button data-href="/admin/reservations/{{ $reservation->id }}" name="edit-button" class="bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">詳細</button></td>
                                    <td><button data-href="/admin/reservations/{{ $reservation->id }}" name="delete-button" class="bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">削除</button></td>
                                </tr>
                                @endforeach
                            </table>
                        </ul>

                        <form method="POST" action="" id="delete-reservation-form">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="delete_check_dialog" style="display:none;">削除します。よろしいですか？</div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>