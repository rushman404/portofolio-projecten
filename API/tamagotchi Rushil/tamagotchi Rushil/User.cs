using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace tamagotchi_Rushil
{
    class User
    {
        public int user_id {  get; set; }
        public string firstname { get; set; }
        public string lastname { get; set; }
        public string email { get; set; }
        public string username { get; set; }
        public string password { get; set; }
        public string sessionKey { get; set; }

        public static bool Registeren(string firstname, string lastname, string email, string username, string password)
        {
            string url = "http://localhost/jaar%202%20Rushil%20Hoelas/Api/Eindproject%20Api/api/registreren.php";

            using (HttpClient client = new HttpClient())
            {
                try
                {
                    // Verzend registratiegegevens naar API
                    var postData = new Dictionary<string, string>()
                    {
                        {"firstname", firstname },
                        {"lastname", lastname },
                        {"email", email },
                        {"username", username },
                        {"password", password}
                    };

                    var formData = new FormUrlEncodedContent(postData);

                    HttpResponseMessage response = client.PostAsync(url, formData).Result;
                    string json = response.Content.ReadAsStringAsync().Result;

                        if (response.IsSuccessStatusCode)
                    {
                        dynamic result = JsonConvert.DeserializeObject(json);

                        if (result.success == true)
                        {
                            MessageBox.Show("Account aangemaakt!");
                            return true;
                        }
                        else
                        {
                            MessageBox.Show("Fout: " + result.error);
                            return false;
                        }
                    }
                    else
                    {
                        MessageBox.Show("Registratie mislukt");
                        return false;
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Registratie mislukt: " + ex.Message);
                    return false;
                }
            }
        }

        public static User Login(string username, string password)
        {
            string url = "http://localhost/jaar%202%20Rushil%20Hoelas/Api/Eindproject%20Api/api/inloggen.php";

            using (HttpClient client = new HttpClient())
            {
                try
                {
                    // Post inloggegevens naar API
                    var postData = new Dictionary<string, string>()
                    {
                        {"username", username},
                        {"password", password}
                    };

                    var formData = new FormUrlEncodedContent(postData);
                    HttpResponseMessage response = client.PostAsync(url, formData).Result;
                    string json = response.Content.ReadAsStringAsync().Result;

                    if (response.IsSuccessStatusCode)
                    {
                        dynamic result = JsonConvert.DeserializeObject(json);

                        // Controleer of login succesvol was
                        if (result.success == true)
                        {
                            // Map API response naar User object
                            User user = new User()
                            {
                                user_id = result.user.id,
                                firstname = result.user.firstname,
                                lastname = result.user.lastname,
                                username = result.user.username,
                                email = result.user.email,
                                password = result.user.password,
                                sessionKey = result.user.sessionKey
                            };

                            return user;
                        }
                        else
                        {
                            MessageBox.Show("Fout: " + result.error);
                            return null;
                        }
                    }
                    else
                    {
                        MessageBox.Show("Login mislukt, probeer opnieuw");
                        return null;
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Login mislukt: " + ex.Message);
                    return null;
                }
            }
        }
    }
}
