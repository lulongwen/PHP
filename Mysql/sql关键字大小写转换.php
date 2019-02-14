/**
 * 2 原理
　　第一步 ：将一个SQL语句字符串拆开来，拆成 字符串-符号串-字符串-符号串-符号串-字符串 这样
　　第二步 ：然后判断字符串是不是关键字，是的话就转成大写
　　第三部 ：再将这些串拼起来

3 实现
　　原理实现要处理两个问题
　　　　1 不可能全转换之后再处理拼接，所以必须边拼接边转换
　　　　2 状态切换，什么时候推送

　　实现步骤
　　　　1 源串打碎成char数组
　　　　2 拼接 重点是判断 如何确定 字母和符号状态，以及在状态切换至将缓冲区推送。详情看代码
　　　　3 最后要再做一次，因为遍历之后最后一个串没有机会被推送
 */

/// <summary>
    /// SQL关键字转换器
    /// </summary>
    public class SqlConverter : IKeywordsConvertible
    {
        public SqlConverter(string[] keywords)
        {
            Keywords = keywords;
        }
        public SqlConverter() { }

        /// <summary>
        /// 关键字集合
        /// </summary>
        public string[] Keywords
        {
            get { return keywords; }
            set
            {
                this.keywords = new string[value.Length];
                for (int i = 0; i < value.Length; i++)
                {
                    this.keywords[i] = value[i].ToLower();
                }
            }
        }

        private string[] keywords;

        /// <summary>
        /// 字符缓冲区
        /// </summary>
        private StringBuilder charBuilder = new StringBuilder();

        /// <summary>
        /// 符号缓冲区
        /// </summary>
        private StringBuilder symboBuilder = new StringBuilder();

        /// <summary>
        /// 结果缓冲区
        /// </summary>
        private StringBuilder resBuilder = new StringBuilder();

        /// <summary>
        /// 上一个字符是否是字母
        /// </summary>
        private bool lastIsLetter;

        /// <summary>
        /// 临时变量
        /// </summary>
        private string temp;

        /// <summary>
        /// 转换
        /// </summary>
        /// <param name="source">要转换的字符串</param>
        /// <returns>转换结果</returns>
        public string Convert(string source)
        {
            charBuilder.Clear();
            symboBuilder.Clear();
            resBuilder.Clear();
            lastIsLetter = true;
            temp = string.Empty;

            // 打散源字符串
            char[] charArray = source.ToArray<char>();

            // 遍历
            foreach (var c in charArray)
            {
                if ((c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z'))
                {
                    // 如果上一个符号不是字母，就把符号缓冲区推送
                    if (!lastIsLetter)
                    {
                        PushSymbols();
                    }
                    charBuilder.Append(c);
                    lastIsLetter = true;
                }
                else
                {
                    // 如果上一个符号是字母，就把字母缓冲区推送
                    if (lastIsLetter)
                    {
                        PushLetters();
                    }
                    symboBuilder.Append(c);
                    lastIsLetter = false;
                }
            }

            // 处理最后一个缓冲区
            if (lastIsLetter)
            {
                PushLetters();
            }
            else
            {
                PushSymbols();
            }

            return resBuilder.ToString();
        }

        /// <summary>
        /// 将字符缓冲区推送至目标缓冲区
        /// </summary>
        private void PushLetters()
        {
            temp = charBuilder.ToString();
            if (Keywords.Contains(temp.ToLower()))
            {
                resBuilder.Append(temp.ToUpper());
            }
            else
            {
                resBuilder.Append(temp);
            }
            charBuilder.Clear();
        }

        /// <summary>
        /// 将符号缓冲区推送至目标缓冲区
        /// </summary>
        private void PushSymbols()
        {
            resBuilder.Append(symboBuilder.ToString());
            symboBuilder.Clear();
        }
    }