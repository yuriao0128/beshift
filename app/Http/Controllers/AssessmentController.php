<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class AssessmentController extends Controller
{

    // 診断ページの質問
    private $questions = [
        ["id" => 1, "question" => "現在の就業状況を教えてください", "options" => ["正社員", "契約社員", "パート・アルバイト", "フリーランス", "求職中"]],
        ["id" => 2, "question" => "予定しているライフイベントを教えてください", "options" => ["出産・育児", "介護", "健康管理", "留学・学び直し", "その他"]],
        ["id" => 3, "question" => "ライフイベントの予定時期", "options" => ["半年以内", "半年～1年以内", "1～2年以内", "2年以上先", "未定"]],
        ["id" => 4, "question" => "希望する働き方", "options" => ["完全リモート", "週2-3日出社", "フレックスタイム", "時短勤務", "通常勤務"]],
        ["id" => 5, "question" => "キャリアの目標", "options" => ["現職維持", "新しいスキル習得", "職種変更", "起業・独立", "ワークライフバランス"]]
    ];

    public function index()
    {
        return redirect()->route('assessment', ['step' => 1]); // 最初の質問へリダイレクト
    }

    // 1問ずつ表示する
    public function showQuestion($step = 1)
    {
        $totalSteps = count($this->questions);

        if ($step > $totalSteps) {
            return redirect()->route('users.mypage'); // 診断完了後はマイページへ
        }

        $question = $this->questions[$step - 1];

        return view('users.assessment', compact('question', 'step', 'totalSteps'));
    }

    // 回答を保存して次の質問へ
    public function storeAnswer(Request $request, $step)
    {
        $answer = $request->input('answer');

        // セッションに保存
        $answers = Session::get('assessment_answers', []);
        $answers[$step] = $answer;
        Session::put('assessment_answers', $answers);

        return redirect()->route('assessment', ['step' => $step + 1]); // 次の質問へ
    }

    // 診断結果を取得し、マイページに表示
    public function showResults()
    {
        $answers = Session::get('assessment_answers', []);
        $summary = !empty($answers) ? "{$answers[3]} に {$answers[2]} のため {$answers[5]} を重視" : null;
    // ログインユーザーがいる場合にDBへ保存
    if (Auth::check() && !empty($summary)) {
        $user = Auth::user();
        $user->career_summary = $summary;
        $user->save();
    }

    $articles = Article::latest()->take(5)->get();

    return view('users.mypage', compact('summary', 'articles'));
    }

}
