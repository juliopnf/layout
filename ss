using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Program
    {

        public void cekPrima(int bil)
        {das
            Boolean status = false;
            if (bil % 2 != 0)
            {
                for (int i = 2; i < bil; i++)
                {
                    if (bil % i != 0)
                    {
                        status = true;
                    }
                    else
                    {
                        status = false;
                        break;
                    }
                }
            }

            if (status)
            {
                Console.WriteLine(bil + " adalah bilangan prima");
            }
            else
            {
                Console.WriteLine(bil + " bukan Prima");
            }
        }
        static void Main(string[] args)
        {
            int bilangan = int.Parse(Console.ReadLine());
            cekPrima(bilangan);
        }
    }
}
