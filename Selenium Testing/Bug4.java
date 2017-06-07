package soccer;

import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Bug4 {

	public static void main(String[] args) {
		
		
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		
		
		
		 String s7 = driver.findElement(By.cssSelector(".left-sidebar>h2")).getText();
	     System.out.println(s7);
	     
		 String s6 = driver.findElement(By.xpath(".//*[@id='accordian']/div[3]/div[1]/h4")).getText();
	     System.out.println(s6);
		 driver.findElement(By.xpath(".//*[@id='accordian']/div[3]/div[1]/h4/a/span/i")).click();
		 driver.findElement(By.xpath(".//*[@id='womens']/div/ul/li[1]/a")).click();
	
		 System.out.println("PUMA");
		
		
         Assert.assertEquals ("Chelsea Away Women's Jersey (M)", driver.findElement(By.cssSelector(".item_name>a")).getText());
         
        
         
        
         

	}

}
