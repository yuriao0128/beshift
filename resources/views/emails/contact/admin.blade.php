{{ $contactInfo['name'] }} 様よりお問い合わせ下記の内容でお問い合わせがありました
内容を確認しご対応をお願いします。

【お問い合わせ内容】
お名前: {{ $contactInfo['name'] }}
お名前（フリガナ）: {{ $contactInfo['name_kana'] }}
メールアドレス: {{ $contactInfo['email'] }}
電話番号: {{ $contactInfo['phone'] }}
お問い合わせ内容:
{{ $contactInfo['body'] }}

※このメールは配信専用のアドレスで配信されています。
このメールに返信されても返信内容の確認およびご返答ができませんので、ご了承ください。