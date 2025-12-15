<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suit Batu Kertas Gunting - Minimalist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --accent: #2563eb;
            --light-bg: #f5f5f5;
            --white: #ffffff;
            --border: #e0e0e0;
            --text-dark: #1a1a1a;
            --text-light: #666666;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            text-align: center;
            background: var(--light-bg);
            padding: 40px 20px;
            margin: 0;
            color: var(--text-dark);
            min-height: 100vh;
        }

        .container {
            background: var(--white);
            display: inline-block;
            padding: 40px;
            border-radius: 8px;
            border: 1px solid var(--border);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        h1 {
            color: var(--text-dark);
            text-transform: capitalize;
            letter-spacing: 0;
            margin: 0 0 10px 0;
            font-weight: 600;
            font-size: 28px;
        }

        .choices {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .choice {
            width: 100px;
            height: 100px;
            background: var(--light-bg);
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 40px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .choice:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
        }

        .result {
            margin: 30px 0;
            padding: 20px;
            background: var(--light-bg);
            border-radius: 8px;
            border: 1px solid var(--border);
            min-height: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .player-choice, .ai-choice {
            font-size: 18px;
            color: var(--text-light);
            margin: 5px 0;
        }

        .game-result {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
            margin-top: 10px;
        }

        .score {
            margin: 20px 0;
            padding: 15px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 6px;
        }

        .score-item {
            display: inline-block;
            margin: 0 15px;
            font-weight: 600;
        }

        .score-item strong {
            color: var(--accent);
            font-size: 18px;
        }

        button {
            padding: 10px 20px;
            margin: 10px 5px;
            font-size: 14px;
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--text-dark);
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-transform: capitalize;
            transition: all 0.2s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        button:hover {
            background: var(--accent);
            color: var(--white);
            border-color: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.15);
        }

        .reset-btn {
            background: var(--accent);
            color: var(--white);
            border-color: var(--accent);
            margin-top: 20px;
        }

        .reset-btn:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><i class="fas fa-hand-rock"></i> Batu Kertas Gunting</h1>
    
    <div class="choices">
        <div class="choice" onclick="play('batu')" title="Batu">🪨</div>
        <div class="choice" onclick="play('kertas')" title="Kertas">📄</div>
        <div class="choice" onclick="play('gunting')" title="Gunting">✂️</div>
    </div>

    <div class="result" id="result" style="display:none;">
        <div class="player-choice">Anda: <span id="playerChoiceDisplay"></span></div>
        <div class="ai-choice">AI: <span id="aiChoiceDisplay"></span></div>
        <div class="game-result" id="gameResult"></div>
    </div>

    <div class="score">
        <div class="score-item">Menang: <strong id="winCount">0</strong></div>
        <div class="score-item">Seri: <strong id="drawCount">0</strong></div>
        <div class="score-item">Kalah: <strong id="loseCount">0</strong></div>
    </div>

    <button class="reset-btn" onclick="resetScore()"><i class="fas fa-redo"></i> Reset</button>
</div>

<script>
    let wins = 0, draws = 0, losses = 0;

    const emojis = {
        batu: '🪨',
        kertas: '📄',
        gunting: '✂️'
    };

    const choices = ['batu', 'kertas', 'gunting'];

    function play(playerChoice) {
        const aiChoice = choices[Math.floor(Math.random() * choices.length)];
        
        let result = '';
        if (playerChoice === aiChoice) {
            result = 'Seri!';
            draws++;
        } else if (
            (playerChoice === 'batu' && aiChoice === 'gunting') ||
            (playerChoice === 'kertas' && aiChoice === 'batu') ||
            (playerChoice === 'gunting' && aiChoice === 'kertas')
        ) {
            result = 'Anda Menang!';
            wins++;
        } else {
            result = 'Anda Kalah!';
            losses++;
        }

        document.getElementById('playerChoiceDisplay').textContent = emojis[playerChoice] + ' ' + playerChoice;
        document.getElementById('aiChoiceDisplay').textContent = emojis[aiChoice] + ' ' + aiChoice;
        document.getElementById('gameResult').textContent = result;
        document.getElementById('result').style.display = 'block';

        updateScore();
    }

    function updateScore() {
        document.getElementById('winCount').textContent = wins;
        document.getElementById('drawCount').textContent = draws;
        document.getElementById('loseCount').textContent = losses;
    }

    function resetScore() {
        wins = 0;
        draws = 0;
        losses = 0;
        document.getElementById('result').style.display = 'none';
        updateScore();
    }
</script>

</body>
</html>
