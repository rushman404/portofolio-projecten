using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace tamagotchi_Rushil
{
    class Scores
    {
        public int id;
        public int userId;
        public string username;
        public int value;
        public string date;

        public static void SendScore(string sessionKey, int score)
        {
            string url = "http://localhost/jaar%202%20Rushil%20Hoelas/Api/Eindproject%20Api/api/addScore.php";

            using (HttpClient client = new HttpClient())
            {
                // Verzend score naar API met sessie
                var postData = new Dictionary<string, string>()
                {
                    { "sessionkey", sessionKey },
                    { "score", score.ToString() }
                };

                var content = new FormUrlEncodedContent(postData);

                var response = client.PostAsync(url, content).Result;
                string json = response.Content.ReadAsStringAsync().Result;

                dynamic result = JsonConvert.DeserializeObject(json);

                if (result.success == true)
                {
                    MessageBox.Show("Score opgeslagen");
                }
                else
                {
                    MessageBox.Show("fout: " + result.error);
                }
            }
        }

        public static List<Scores> getTop10(string sessionKey)
        {
            string url = "http://localhost/jaar%202%20Rushil%20Hoelas/Api/Eindproject%20Api/api/getTop10.php";
            List<Scores> topScores = new List<Scores>();

            using (HttpClient client = new HttpClient())
            {
                // Vraag top 10 scores op van API
                var postData = new Dictionary<string, string>()
                {
                    {"sessionkey", sessionKey }
                };

                var content = new FormUrlEncodedContent(postData);
                var response = client.PostAsync(url, content).Result;
                string json = response.Content.ReadAsStringAsync().Result;

                dynamic result = JsonConvert.DeserializeObject(json);

                if (result.success == true)
                {
                    // Map API response naar Score objecten met plaatsing
                    int place = 1;
                    foreach (var s in result.topScores)
                    {
                        topScores.Add(new Scores
                        {
                            id = place,  
                            userId = 0, 
                            username = s.user_username,
                            value = s.score_value,
                            date = s.score_date
                        });
                        place++;
                    }
                }
                else
                {
                    MessageBox.Show("Fout bij ophalen top 10: " + result.error);
                }
            }
            return topScores;
        }
    }
}
