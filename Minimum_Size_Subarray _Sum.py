"""Given an array of positive integers nums and a positive integer target, return the minimal length of a 
subarray
 whose sum is greater than or equal to target. If there is no such subarray, return 0 instead."""
 
class Solution:
    def minSubArrayLen(self, target: int, nums) -> int:
        self.nums=nums
        CountTarget=0
        sum=0
        num=0
        for j in range(len(nums)):
            num=0
            for i in range(len(self.nums)):
                if self.nums[i]>=num:
                    num=self.nums[i]
            CountTarget+=1  
            sum=sum+num
            print(num)
            if sum >= target:
                return CountTarget
            self.nums.remove(num)
        return 0

            



NewClas = Solution()
print(NewClas.minSubArrayLen(213,[12,28,83,4,25,26,25,2,25,25,25,12]))
                
                    
                
        
                        
                
         