<?php

class EmojiModifier
{

        private array $emojis = [
            'o/'         => '👋',
            '</3'        => '💔',
            '<3'         => '💗',
            '8-D'        => '😁',
            '8D'         => '😁',
            ':-D'        => '😁',
            '=-3'        => '😁',
            '=-D'        => '😁',
            '=3'         => '😁',
            '=D'         => '😁',
            'B^D'        => '😁',
            'X-D'        => '😁',
            'XD'         => '😁',
            'x-D'        => '😁',
            'xD'         => '😁',
            ':\')'       => '😂',
            ':\'-)'      => '😂',
            ':-))'       => '😃',
            '8)'         => '😄',
            ':)'         => '😄',
            ':-)'        => '😄',
            ':3'         => '😄',
            ':D'         => '😄',
            ':]'         => '😄',
            ':^)'        => '😄',
            ':c)'        => '😄',
            ':o)'        => '😄',
            ':}'         => '😄',
            ':っ)'        => '😄',
            '=)'         => '😄',
            '=]'         => '😄',
            '0:)'        => '😇',
            '0:-)'       => '😇',
            '0:-3'       => '😇',
            '0:3'        => '😇',
            '0;^)'       => '😇',
            'O:-)'       => '😇',
            '3:)'        => '😈',
            '3:-)'       => '😈',
            '}:)'        => '😈',
            '}:-)'       => '😈',
            '*)'         => '😉',
            '*-)'        => '😉',
            ':-,'        => '😉',
            ';)'         => '😉',
            ';-)'        => '😉',
            ';-]'        => '😉',
            ';D'         => '😉',
            ';]'         => '😉',
            ';^)'        => '😉',
            ':-|'        => '😐',
            ':|'         => '😐',
            ':('         => '😒',
            ':-('        => '😒',
            ':-<'        => '😒',
            ':-['        => '😒',
            ':-c'        => '😒',
            ':<'         => '😒',
            ':['         => '😒',
            ':c'         => '😒',
            ':{'         => '😒',
            ':っC'        => '😒',
            '%)'         => '😖',
            '%-)'        => '😖',
            ':-P'        => '😜',
            ':-b'        => '😜',
            ':-p'        => '😜',
            ':-Þ'        => '😜',
            ':-þ'        => '😜',
            ':P'         => '😜',
            ':b'         => '😜',
            ':p'         => '😜',
            ':Þ'         => '😜',
            ':þ'         => '😜',
            ';('         => '😜',
            '=p'         => '😜',
            'X-P'        => '😜',
            'XP'         => '😜',
            'd:'         => '😜',
            'x-p'        => '😜',
            'xp'         => '😜',
            ':-||'       => '😠',
            ':@'         => '😠',
            ':-.'        => '😡',
            ':-/'        => '😡',
            ':/'         => '😡',
            ':L'         => '😡',
            ':S'         => '😡',
            ':\\'        => '😡',
            '=/'         => '😡',
            '=L'         => '😡',
            '=\\'        => '😡',
            ':\'('       => '😢',
            ':\'-('      => '😢',
            '^5'         => '😤',
            '^<_<'       => '😤',
            'o/\\o'      => '😤',
            '|-O'        => '😫',
            '|;-)'       => '😫',
            ':###..'     => '😰',
            ':-###..'    => '😰',
            'D-\':'      => '😱',
            'D8'         => '😱',
            'D:'         => '😱',
            'D:<'        => '😱',
            'D;'         => '😱',
            'D='         => '😱',
            'DX'         => '😱',
            'v.v'        => '😱',
            '8-0'        => '😲',
            ':-O'        => '😲',
            ':-o'        => '😲',
            ':O'         => '😲',
            ':o'         => '😲',
            'O-O'        => '😲',
            'O_O'        => '😲',
            'O_o'        => '😲',
            'o-o'        => '😲',
            'o_O'        => '😲',
            'o_o'        => '😲',
            ':$'         => '😳',
            '#-)'        => '😵',
            ':#'         => '😶',
            ':&'         => '😶',
            ':-#'        => '😶',
            ':-&'        => '😶',
            ':-X'        => '😶',
            ':X'         => '😶',
            ':-J'        => '😼',
            ':*'         => '😽',
            ':^*'        => '😽',
            'ಠ_ಠ'        => '🙅',
            '*\\0/*'     => '🙆',
            '\\o/'       => '🙆',
            ':>'         => '😄',
            '>.<'        => '😡',
            '>:('        => '😠',
            '>:)'        => '😈',
            '>:-)'       => '😈',
            '>:/'        => '😡',
            '>:O'        => '😲',
            '>:P'        => '😜',
            '>:['        => '😒',
            '>:\\'       => '😡',
            '>;)'        => '😈',
            '>_>^'       => '😤',
        ];

        public function replace($string) : string {
            $find = array_keys($this->emojis);
            $replace = array_values($this->emojis);
            return str_ireplace($find, $replace, $string);
        }

}

